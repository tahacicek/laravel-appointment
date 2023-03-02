<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5>Randevu Formu</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="name">Ad Soyad</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Adınızı Soyadınızı Giriniz"
                model="name"
              />
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="name">E-Posta</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    placeholder="E-Postanızı Giriniz"
                    model="email"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="name">Telefon No</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    placeholder="Telefon Numarınızı Giriniz"
                    model="phone"
                  />
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="name">Randevu Tarihi</label>
              <input type="date" @change="selectDate" class="form-control" id="date" model="date" />
            </div>
            <!-- Some borders are removed -->
            <div class="list-group">
              <label v-for="hours in workingHours" class="list-group-item">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    model="hour"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    {{ hours.hour }}
                  </label>
                </div>
              </label>
            </div>
              <div class="form-group mb-3 mt-2">
                <label for="name">Mesajınız</label>
                <textarea class="form-control" model="text" id="text"  rows="5"></textarea>
              </div>
          </div>
          <div class="card-footer col-md-12">
            <button @click="store" class="btn btn-primary float-end">Randevu Al</button>
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
      hour: "",
      name: "",
      email: "",
      phone: "",
      date: new Date().toISOString().substr(0, 10),
      text: "",
      workingHours: []
    };
  },
  methods: {
    store() {
      console.log(date);
    },
    selectDate() {
        console.log('date');
    },
  },
  mounted() {
    axios.get("/api/working-hours").then((response) => {
      this.workingHours = response.data;
    });
  },
};
</script>
