<template>
  <div class="row" v-if="$parent.userCan('view-outlets')">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Packages <span v-if="total">({{ total }})</span></h4>
            <div class="card-header-action">
              <a v-if="$parent.userCan('create-packages')" v-bind:href="$parent.MakeUrl('admin/packages/create')" class="btn btn-primary">Add <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice"  v-if="!loading">
              <table class="table table-striped" v-if="packages.length">
                  <tbody>
                      <tr>
                          <th>#</th>
                          <th>Outlet</th>
                          <th>Type</th>
                          <th>Package Name</th>
                          <th>Price</th>
                          <th></th>
                      </tr>
                      <tr v-for="paket, index in packages">
                          <td>{{ index + 1 }}</td>
                          <td>{{ paket.outlet.nama }}</td>
                          <td>{{ paket.jenis }}</td>
                          <td>{{ paket.nama_paket }}</td>
                          <td>{{ paket.harga }}</td>
                          <td class="text-right">
                              <button v-if="$parent.userCan('delete-packages')" @click="deletePackage(paket.id, index)" class="btn btn-danger">
                                  <i class="fa fa-trash"></i>
                              </button>
                              <a v-if="$parent.userCan('edit-packages')" v-bind:href="packagelink.concat(paket.id + '/edit')" class="btn btn-primary">
                                  <i class="fa fa-edit"></i>
                              </a>
                          </td>
                      </tr>
                  </tbody>
              </table>
              <div v-if="!packages.length" class="text-center p-3 text-muted">
                  <h5>No Results</h5>
                  <p>Looks like you have not added any packages yet!</p>
              </div>
            </div>
        </div>
        <div class="text-center" v-if="packages.length && total > packages.length">
            <button v-bind:disabled="loading" @click="loadPackages" class="btn btn-primary"><span v-if="loading">Loading <i class="fas fa-spinner fa-spin"></i></span><span v-else>Load More</span></button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
     data() {
        return {
            packages: [],
            url: '',
            query: '',
            total: 0,
            loading: false,
            loadingmore: false,
            packagelink: '/admin/packages/'
        }
    },
    mounted() {
        let query = location.search.split('query=')[1];
        if(query !== undefined) {
            this.query = query;
        }
        this.url = BaseUrl('admin/packages?q='+this.query);
        this.loadPackages();
    },
     methods: {
        loadPackages() {
            this.loading = true;
            axios.get(this.url).then((res) => {
                this.packages = this.packages.concat(res.data.data);
                console.log(res);
                this.total = res.data.total;
                this.loading = false;
                this.url = res.data.next_page_url;
            }).catch((err) => {
                this.loading = false;
                console.log(err);
            });
        },

        deletePackage(packageId, index) {
            let _this = this;
            this.$iosConfirm({
                title: 'Are you sure?',
                text: 'The outlet and their associated data will be permanently deleted. Proceed?'
            }).then(function() {
                axios.delete(_this.$parent.MakeUrl('admin/packages/'+packageId)).then((res) => {
                    console.log(res);
                    _this.packages.splice(index, 1);
                    _this.total = _this.total - 1;
                    _this.loadPackages();
                }).catch(error => {
                    _this.$iosAlert({
                        'title': 'Error',
                        'text': error.response.data.message
                    });
                });
            });
        }
    }
}
</script>

<style>

</style>