<template>
    <div class="">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Chat Now
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Chat With {{ receiverid }} {{ receivername }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="sendMsg()">
                        <div class="modal-body">
                            <textarea class="form-control" v-model="form.msg" rows="3" placeholder="Type Your Message"></textarea>
                            <span class="text-success" v-if="succMessage.message">{{ succMessage.message }}</span>
                            <span class="text-danger" v-if="errors.msg">{{ errors.msg[0] }}</span>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

    export default {
        props: ['receiverid','receivername'],
        data() {
            return {
                form: {
                    msg: "",
                    receiver_id: this.receiverid
                },
                errors: {},
                succMessage: {},
            }
        },
        methods: {
            sendMsg() {
                axios.post('/send-message', this.form)
                .then((res) => {
                    this.form.msg = "";
                    this.succMessage = res.data;
                    console.log(res.data);
                }).catch((err) => {
                    this.errors = err.response.data.errors;
                })
            }
        }
    }
</script>
