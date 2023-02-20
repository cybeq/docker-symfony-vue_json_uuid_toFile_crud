<template>
 <div style="text-align: center">

        <div style="display:flex; align-items: center; justify-content: center">
            <textarea spellcheck="false" v-model="formFill"  :style="isJSONValid" style="font-weight:bold; width:50%; height:200px; max-height: 500px; display:flex; align-self: center; justify-content: center" class="form-control"></textarea>
        </div>

        <button :disabled="!isJSONValid.boolean || this.formFill.length<3" @click="sendMessage" type="button" class="btn btn-success" style="margin-block:30px">send </button>

        <p :hidden="isJSONValid.boolean" style="padding:0;margin:0">Wiadomość musi być w formacie <span style="color:darkgreen">JSON</span></p>

        <vue-json-pretty  :data="null" hidden></vue-json-pretty>



        <div>
           <DxDataGrid :data-source="this.dataSource" :columns="this.columns"></DxDataGrid>
        </div>

 </div>

  <popup :show="show" @close="closePopup">

    <h2>Message</h2>
    <p>has been sent.</p>

  </popup>

</template>

<script>
import { messageService } from '/src/services/MessageService';
import Popup from "./PopupComponent.vue";
import { createApp, h } from 'vue';
import VueJsonPretty from 'vue-json-pretty';
import 'vue-json-pretty/lib/styles.css';
import { DxDataGrid } from 'devextreme-vue';
import DataSource from 'devextreme/data/data_source';


export default {
  components:{
    VueJsonPretty, Popup, DxDataGrid
  },
  data() {

    return {formFill:'{}', messages: [], show:false, dataSource: new DataSource({
        store: {
          type: 'array',
          data: [{}]  ,
          key: 'UUID',
        },
      }),

      columns: [
                  {
                    width: 350,
                    dataField: 'UUID',
                    caption: 'UUID',
                    dataType: 'string',
                    cssClass:'bold-column'
                  },
                  {
                    width: 450,
                    dataField: 'content',
                    caption: 'Message',
                    cellTemplate: function(container, options)
                    {
                      const app = createApp({
                        data() {  return {rowData: JSON.parse(options.data.content || '{}'),};  },
                        render() {  return h(VueJsonPretty, { data: this.rowData });  },
                      });
                      app.mount(container);
                    }
                  }
                ],
           };
  },

  computed:{
    isJSONValid(){
      return {
        color: isJSONValid(this.formFill) ? "darkgreen" : "darkred",
        boolean:isJSONValid(this.formFill)
      };},    },

  mounted() {
    messageService.getMessages()
        .then(messages => {this.messages = messages
          this.dataSource = new DataSource({
            store: {
              type: 'array',
              data: this.messages,
              key: 'UUID',
            },})}) .catch(error => {console.error(error)})    },

  methods:{
    sendMessage(){ messageService.sendMessage(this.formFill).then(this.showPopup()).catch(err=>{console.log(err)}) },
    showPopup() {this.show = true;},
    closePopup() {this.show = false;},      },

};
function isJSONValid(str) { try { JSON.parse(str);} catch (e) { return false; } return true;}
</script>

<style>
.dx-header-row > td[role="columnheader"]> div.dx-datagrid-text-content {
  font-size: 17px;
  font-weight: bold;
  cursor:pointer;
  text-decoration: underline;
}
</style>