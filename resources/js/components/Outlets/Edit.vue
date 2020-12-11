<template>
  <div class="row">
      <div class="col-12">
          <div class="alert alert-primary" v-if="message">
            {{ message }}
         </div>
         <div class="card">
             <div class="card-header">
                <h4>Update Outlet</h4>
            </div>
            <div class="card-body">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                    <div class="col-sm-12 col-md-7">
                        <input v-bind:class="{'is-invalid': errors.nama}" type="text" v-model="form.nama" class="form-control" placeholder="Full name of the outlet.">
                        <div class="invalid-feedback" v-if="errors.nama">
                            <p>{{ errors.nama[0] }}</p>
                        </div>
                    </div>
                </div>
                   <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                    <div class="col-sm-12 col-md-7">
                        <textarea v-bind:class="{'is-invalid': errors.alamat}" class="is-invalid" v-model="form.alamat" placeholder="Full address of the outlet.." cols="75" rows="10">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora illum nostrum tenetur velit, culpa voluptas maxime, incidunt sint fuga ipsum nobis quos similique error laboriosam alias ea beatae sequi soluta.
                        </textarea>
                        <div class="invalid-feedback" v-if="errors.alamat">
                            <p>{{ errors.alamat[0] }}</p>
                        </div>
                    </div>
                </div>
                 <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                    <div class="col-sm-12 col-md-7">
                        <input v-bind:class="{'is-invalid': errors.tlp}" type="number" v-model="form.tlp" class="form-control" placeholder="Phone number of the outlet.">
                        <div class="invalid-feedback" v-if="errors.tlp">
                            <p>{{ errors.tlp[0] }}</p>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button v-bind:disabled="loading" @click="updateOutlet" class="btn btn-primary"><span v-if="loading">Updating</span><span v-else>Update</span></button>
                    </div>
                </div>
             </div>
         </div>
      </div>
  </div>
</template>

<script>
export default {
    props: ['outlet'],
    data() {
        return {
            form: {
                nama: this.getOutletData('nama'),
                alamat: this.getOutletData('alamat'),
                tlp: this.getOutletData('tlp'),
            },
            message: '',
            errors: [],
            loading: false,
        }
    },
    mounted() {

    },
    methods: {
         getOutletData(key) {
            return JSON.parse(this.outlet)[key];
        },

        updateOutlet() {
            let _this = this;
            _this.errors = [];
            _this.message = '';
            _this.loading = true;
            axios.patch(this.$parent.MakeUrl('admin/outlets/'+this.getOutletData('id')), _this.form).then((res) => {
                _this.loading = false;
                _this.message = 'Outlet details have been updated successfully!';
            }).catch((err) => {
                _this.errors = err.response.data.errors;
                _this.loading = false;
            });
        }
    }
}
</script>

<style>

</style>