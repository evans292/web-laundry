<template>
  <div class="row" v-if="$parent.userCan('view-outlets')">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Outlets <span v-if="total">({{ total }})</span></h4>
                <div class="card-header-action">
                    <a v-if="$parent.userCan('create-outlets')" v-bind:href="$parent.MakeUrl('admin/outlets/create')" class="btn btn-primary">Add <i class="fas fa-plus"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive table-invoice"  v-if="!loading">
                    <table class="table table-striped" v-if="outlets.length">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Adress</th>
                                <th>Telephone</th>
                                <th></th>
                            </tr>
                            <tr v-for="outlet, index in outlets">
                                <td>{{ index + 1 }}</td>
                                <td>{{ outlet.nama }}</td>
                                <td>{{ outlet.alamat }}</td>
                                <td>{{ outlet.tlp }}</td>
                                <td class="text-right">
                                    <button v-if="$parent.userCan('delete-outlets')" @click="deleteOutlet(outlet.id, index)" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a v-if="$parent.userCan('edit-outlets')" v-bind:href="outletlink.concat(outlet.id + '/edit')" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="!outlets.length" class="text-center p-3 text-muted">
                        <h5>No Results</h5>
                        <p>Looks like you have not added any outlets yet!</p>
                    </div>
                </div>
                <div class="text-center p-4 text-muted" v-else>
                    <h5>Loading</h5>
                    <p>Please wait, data is being loaded...</p>
                </div>
            </div>
        </div>
        <div class="text-center" v-if="outlets.length && total > outlets.length">
            <button v-bind:disabled="loading" @click="loadUsers" class="btn btn-primary"><span v-if="loading">Loading <i class="fas fa-spinner fa-spin"></i></span><span v-else>Load More</span></button>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            outlets: [],
            url: '',
            query: '',
            total: 0,
            loading: false,
            loadingmore: false,
            outletlink: '/admin/outlets/'
        }
    },
    mounted() {
        let query = location.search.split('query=')[1];
        if(query !== undefined) {
            this.query = query;
        }
        this.url = BaseUrl('admin/outlets?q='+this.query);
        this.loadOutlets();
    },
    methods: {
        loadOutlets() {
            this.loading = true;
            axios.get(this.url).then((res) => {
                this.outlets = this.outlets.concat(res.data.data);
                console.log(res);
                this.total = res.data.total;
                this.loading = false;
                this.url = res.data.next_page_url;
            }).catch((err) => {
                this.loading = false;
                console.log(err);
            });
        },

        deleteOutlet(outletId, index) {
            let _this = this;
            this.$iosConfirm({
                title: 'Are you sure?',
                text: 'The outlet and their associated data will be permanently deleted. Proceed?'
            }).then(function() {
                axios.delete(_this.$parent.MakeUrl('admin/outlets/'+outletId)).then((res) => {
                    console.log(res);
                    _this.outlets.splice(index, 1);
                    _this.total = _this.total - 1;
                    _this.loadOutlets();
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