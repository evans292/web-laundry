<template>
  <div class="row">
      <div class="col-12">
          <div class="alert alert-primary" v-if="message">
            {{ message }}
          </div>
          <div class="card">
              <div class="card-header">
                <h4>Add a New Package</h4>
              </div>
              <div class="card-body">
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Outlet</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" v-model="form.outlet_id" v-bind:class="{'is-invalid': errors.outlet_id}">
                            <option  v-if="$parent.userCan('edit-packages')" v-for="outlet in outlets" v-bind:value="outlet.id">{{ outlet.nama }}</option>
                        </select>
                        <div class="invalid-feedback" v-if="errors.outlet_id">
                            <p>{{ errors.outlet_id[0] }}</p>
                        </div>
                    </div>
                </div>
                    <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                    <div class="col-sm-12 col-md-7">
                        <select class="form-control" v-model="form.jenis" v-bind:class="{'is-invalid': errors.jenis}">
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="bed_cover">Bed Cover</option>
                            <option value="lain">Lain lain</option>
                        </select>
                        <div class="invalid-feedback" v-if="errors.jenis">
                            <p>{{ errors.jenis[0] }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package Name</label>
                    <div class="col-sm-12 col-md-7">
                        <input v-bind:class="{'is-invalid': errors.nama_paket}" type="text" v-model="form.nama_paket" class="form-control" placeholder="Full name of the package.">
                        <div class="invalid-feedback" v-if="errors.nama_paket">
                            <p>{{ errors.nama_paket[0] }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                    <div class="col-sm-12 col-md-7">
                        <input v-bind:class="{'is-invalid': errors.harga}" type="number" v-model="form.harga" class="form-control" placeholder="Price of the package.">
                        <div class="invalid-feedback" v-if="errors.harga">
                            <p>{{ errors.harga[0] }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button v-bind:disabled="loading" @click="addPackage" class="btn btn-primary"><span v-if="loading">Adding</span><span v-else>Add</span></button>
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
            form: {
                outlet_id: 0,
                jenis: '',
                nama_paket: '',
                harga: 0,
            },
            message: '',
            outlets: '',
            errors: [],
            loading: false
        }
    },
    mounted() {
        this.getOutlets();
    },
    methods: {
        getOutlets() {
            axios.get(this.$parent.MakeUrl('admin/outlets/getOutlets')).then((res) => {
                this.outlets = res.data;
            }).catch((err) => {
                console.log(err);
            })
        },

        addPackage() {
            this.errors = [],
            this.message = '',
            this.loading = true,
            console.log(this.form.nama_paket);
            axios.post(this.$parent.MakeUrl('admin/packages'), this.form).then(res => {
                this.loading = false;
                this.resetForm();
                this.message = 'The package has been succesfully registered'
            }).catch(err => {
                console.log(err.response.data.errors);
                this.errors = err.response.data.errors;
                this.loading.false
            });
        },

        resetForm() {
            this.form.outlet_id = 0;
            this.form.jenis = '';
            this.form.nama_paket = '';
            this.form.harga = 0;
        }
    }
}
</script>

<style>

</style>