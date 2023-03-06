<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5>Randevu Formu</h5>
          </div>
          <div class="card-body">
            <div v-if="errors.length > 0" class="alert alert-danger">
              <ul>
                <li v-for="error in errors" :key="error">
                  {{ error }}
                </li>
              </ul>
            </div>
            <div class="form-group mb-3">
              <label for="name">Ad Soyad</label>
              <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Adınızı Soyadınızı Giriniz"
                v-model="name"
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
                    v-model="email"
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
                    v-model="phone"
                    placeholder="Telefon Numaranızı Giriniz"
                  />
                </div>
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="name">Randevu Tarihi</label>
              <input
                type="date"
                @change="selectDate"
                class="form-control"
                id="date"
                v-model="date"
              />
            </div>
            <!-- Some borders are removed -->
            <div class="list-group">
              <div v-for="hours in workingHours" class="list-group-item">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    v-model="hour"
                    :id="hours.hour"
                    :value="hours.hour"
                  />
                  <label class="form-check-label" :for="hours.hour">
                    {{ hours.hour }}
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group mb-3 mt-2">
              <label for="name">Mesajınız</label>
              <textarea class="form-control" model="text" id="text" rows="5"></textarea>
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
      errors: [],
      hour: 0,
      name: null,
      email: null,
      phone: null,
      date: new Date().toISOString().slice(0, 10),
      text: null,
      workingHours: [],
    };
  },
  methods: {
    store() {
      if (this.name && this.email && this.phone && this.hour) {
        axios.post("/api/appointment-store", {
          full_name: this.name,
          email: this.email,
          phone: this.phone,
          date: this.date,
          time_id: this.hour.id,
          message: this.text,
        });
      }
      this.errors = [];
      if (!this.name) {
        this.errors.push("Ad Soyad alanı boş bırakılamaz.");
      } else if (this.name.length < 5) {
        this.errors.push("Ad Soyad alanı en az 5 karakter olmalıdır.");
      } else if (this.name.length > 50) {
        this.errors.push("Ad Soyad alanı en fazla 50 karakter olmalıdır.");
      } else if (!this.name.match(/^[a-zA-Z ]*$/)) {
        this.errors.push("Ad Soyad alanı sadece harf içermelidir.");
      }
      if (!this.email) {
        this.errors.push("E-Posta alanı boş bırakılamaz.");
      } else if (!this.email.match(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/)) {
        this.errors.push("E-Posta alanı geçerli bir e-posta adresi olmalıdır.");
      }
      if (!this.phone) {
        this.errors.push("Telefon alanı boş bırakılamaz.");
      }

      if (!this.date) {
        this.errors.push("Randevu Tarihi alanı boş bırakılamaz.");
      }

      if (!this.hour) {
        this.errors.push("Randevu Saati alanı boş bırakılamaz.");
      }
    },
    selectDate() {
      axios.get(`/api/working-hours/${this.date}`).then((response) => {
        this.workingHours = response.data;
      });
    },
  },
  mounted() {
    axios.get("/api/working-hours").then((response) => {
      this.workingHours = response.data;
    });
  },
};
</script>
