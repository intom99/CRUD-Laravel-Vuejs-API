<template>
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col md-12">
        <div class="card card-default">
          <div class="card-header">EDIT PRODUCT</div>
          <div class="card-body">
            <form @submit.prevent="ProductUpdate">
              <div class="form-group">
                <label>Product Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="p.product_name"
                  placeholder="Input data"
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
                  class="form-control"
                  v-model="p.stock"
                  placeholder="Input data"
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
                  class="form-control"
                  v-model="p.price"
                  placeholder="Input data"
                />
                <div v-if="validation.price">
                  <div class="alert alert-danger mt-1" role="alert">
                    {{ validation.price[0] }}
                  </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-md btn-success">
                  UPDATE
                </button>
                <button type="reset" class="btn btn-md btn-danger">
                  RESET
                </button>
              </div>
            </form>
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
  created() {
    let uri = `http://localhost:8000/api/product/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.p = response.data.data;
    });
  },
  methods:{
      ProductUpdate(){
          let uri = `http://localhost:8000/api/product/${this.$route.params.id}`;
          this.axios.post(uri, this.p)
          .then((response)=>{
              this.$router.push({ path: "/" });
          }).catch(error =>{
              this.validation = error.data.data;
          });
      }
  }
};
</script>

<style>
</style>
