<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col md-12">
        <div class="card card-default">
          <div class="card-header">CREATE PRODUCT</div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <form @submit.prevent="ProductStore">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input
                      type="text"
                      v-model="p.product_name"
                      class="form-control"
                      placeholder="Input product name"
                    />
                    <div v-if="validation.product_name">
                      <div class="alert alert-danger mt-1" role="alert">
                        {{ validation.product_name[0] }}
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Stock</label>
                    <input
                      type="text"
                      v-model="p.stock"
                      class="form-control"
                      placeholder="Input stock"
                    />
                    <div v-if="validation.stock">
                      <div class="alert alert-danger mt-1" role="alert">
                        {{ validation.stock[0] }}
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Price</label>
                    <input
                      type="text"
                      v-model="p.price"
                      class="form-control"
                      placeholder="Input price"
                    />
                    <div v-if="validation.price">
                      <div class="alert alert-danger mt-1" role="alert">
                        {{ validation.price[0] }}
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-success" type="submit">SAVE</button>
                    <button class="btn btn-danger" type="reset">RESET</button>
                  </div>
                </form>
              </div>
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
      p: {},
      validation: [],
    };
  },
  methods: {
    ProductStore() {
      let uri = "http://localhost:8000/api/product";
      this.axios
        .post(uri, this.p)
        .then(() => {
          this.$router.push({ path: "/" });
        })
        .catch((error) => {
          this.validation = error.data.data;
        });
    },
  },
};
</script>

<style>
</style>