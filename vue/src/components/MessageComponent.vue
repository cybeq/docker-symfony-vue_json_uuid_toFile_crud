<template>
  <div style="text-align: center">

        <div style="display:flex; align-items: center; justify-content: center">
          <textarea spellcheck="false" v-model="formFill"  :style="isJSONValid" style="font-weight:bold; width:50%; height:200px; max-height: 500px; display:flex; align-self: center; justify-content: center" class="form-control"></textarea>
        </div>

        <button :disabled="!isJSONValid.boolean || this.formFill.length<3" @click="sendMessage" type="button" class="btn btn-success" style="margin-block:30px">send </button>

        <p :hidden="isJSONValid.boolean" style="padding:0;margin:0">Wiadomość musi być w formacie <span style="color:darkgreen">JSON</span></p>

          <div style="display:grid; grid-template-columns: repeat(3, 1fr); padding:5%;" >
            <div v-for="message in messages" :key="message.uuid">
              <span style="font-size:0.7em"><strong>UUID </strong>{{message.UUID}}</span>
              <vue-json-pretty  :data="JSON.parse(message.content)"></vue-json-pretty>
            </div>
          </div>

  </div>


  <popup :show="show" @close="closePopup">
    <!-- Content to display inside the popup -->
    <h2>Message</h2>
    <p>has been sent.</p>
  </popup>

</template>

<script>
import { messageService } from '/src/services/MessageService';
import Popup from "./PopupComponent.vue";
import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';
export default {
  components:{
    VueJsonPretty, Popup,
  },
  data() {
    return {formFill:'{}', messages: [], show:false };
  },
  computed:{
    isJSONValid(){
      return {
        color: isJSONValid(this.formFill) ? "darkgreen" : "darkred",
        boolean:isJSONValid(this.formFill)
      };}
  },
  mounted() {
    messageService.getMessages()
        .then(messages => {this.messages = messages})
        .catch(error => {console.error(error)})
    },

  methods:{
    sendMessage(){
      messageService.sendMessage(this.formFill)
          .then(this.showPopup())
          .catch(err=>{console.log(err)})
    },
    showPopup() {this.show = true;},
    closePopup() {this.show = false;},
  }
};
function isJSONValid(str) { try { JSON.parse(str);} catch (e) { return false; } return true;}
</script>