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
            <div class="form-group mb-3">
              <label for="name">Randevu Tarihi</label>
              <input type="date" class="form-control" id="date" model="date" />
            </div>
            <!-- Some borders are removed -->
            <div class="list-group">
              <label class="list-group-item">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    Default radio
                  </label>
                </div>
              </label>
              <label class="list-group-item">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    Default radio
                  </label>
                </div>
              </label>
              <label class="list-group-item">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    Default radio
                  </label>
                </div>
              </label>
              <label class="list-group-item">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="flexRadioDefault"
                    id="flexRadioDefault1"
                  />
                  <label class="form-check-label" for="flexRadioDefault1">
                    Default radio
                  </label>
                </div>
              </label>
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
      name: "",
      email: "",
      phone: "",
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
