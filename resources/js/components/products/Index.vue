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
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(p, index) in products" :key="p.id">
                    <td>{{ p.product_name }}</td>
                    <td>{{ p.stock }}</td>
                    <td>{{ p.price }}</td>
                    <td class="text-center">
                      <router-link
                        :to="{ name: 'edit', params: { id: p.id } }"
                        class="btn btn-sm btn-primary"
                        >Edit</router-link>
                      <button
                        @click.prevent="ProductDelete(p.id, index)"
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
  methods:{
    ProductDelete(id, index){
      this.axios.delete(`http://localhost:8000/api/product/${id}`)
      .then(response =>{
          
          this.$delete(this.products,index);
          
      }).catch(error=>{
        alert('system error!');
      });
    }
  }
};
</script>

<style>
</style>