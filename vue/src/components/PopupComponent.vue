<template>
  <div class="popup" v-if="show">
    <div class="popup-overlay"></div>
    <div class="popup-content">

      <slot></slot>
      <button  type="button" class="btn btn-outline-success" @click="closePopup">OK</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "PopupComponent",
  props: {
    show: {
      type: Boolean,
      required: true,
    },
  },
  methods: {
    closePopup() {
      location.reload();
      this.$emit("close");

    },
  },
};
</script>

<style scoped>
.popup {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.popup-overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
}

.popup-content {
  position: relative;
  z-index: 1;
  max-width: 90%;
  max-height: 90%;
  overflow: auto;
  background-color: white;
  padding: 1rem;
  border-radius: 0.5rem;
}

.close {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 2rem;
  padding: 0.5rem;
  border: none;
  background: none;
  color: white;
}
</style>