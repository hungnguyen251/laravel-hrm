<template>
    <div class="input-group">
        <input
            id="btn-input"
            type="text"
            name="message"
            class="form-control input-sm"
            placeholder="Type your message here..."
            v-model="newMessage"
            @keyup.enter="sendMessage"
        />
            <div class="input-group">
                <!-- <input type="text" class="form-control" placeholder="Type your message"> -->
                <button class="btn btn-primary" id="btn-chat" @click="sendMessage">Send</button>
            </div>
        </div>
</template>
<script>
    export default {
        //Takes the "user" props from <chat-form> … :user="{{ Auth::user() }}"></chat-form> in the parent chat.blade.php.
        props: ["user"],
        data() {
            return {
                newMessage: "",
            };
        },
        methods: {
        sendMessage() {
            //Emit a "messagesent" event including the user who sent the message along with the message content
            this.$emit("messagesent", {
                user: this.user,
                //newMessage is bound to the earlier "btn-input" input field
                message: this.newMessage,
            });
            //Clear the input
            this.newMessage = "";
        },
        },
    };
</script>