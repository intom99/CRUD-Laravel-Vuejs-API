<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col md-12">
        <div class="card card-default">
          <div class="card-header">PRODUCTS</div>

          <div class="card-body">
            <router-link :to="{ name: 'create' }" class="btn btn-md btn-success"
              >Add Product</router-link
            >
            <div class="table-responsive mt-2">
              <table class="table table-hover table-bordered">
                <thead>
                  <tr>
                    <td>Product Name</td>
                    <td>Stock</td>
                    <td>Price</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="p in products" :key="p.id">
                    <td>{{ p.product_name }}</td>
                    <td>{{ p.stock }}</td>
                    <td>{{ p.price }}</td>
                    <td class="text-center">
                      <router-link
                        :to="{ name: 'edit', params: { id: p.id } }"
                        class="btn btn-sm btn-primary"
                        >Edit</router-link
                      >
                      <button
                        @click.prevent="ProductDelete(p.id)"
                        class="btn btn-sm btn-danger"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  created() {
    let uri = "http://localhost:8000/api/product";
    this.axios.get(uri).then((response) => {
      this.products = response.data.data;
    });
  },
};
</script>

<style>
</style>