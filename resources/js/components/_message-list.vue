<template>
    <ul class="chat chat-box chatContainerScroll">
        <li class="right clearfix d-flex my-3" v-for="(message, index) in allMessages" :key="index">
            <div class="chat-avatar">
                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                <div class="chat-name">
                    <strong>
                        {{ message.user.name }}
                    </strong>
                </div>
            </div>
            <div class="chat-text">
                <p>
                    {{ message.message }}
                </p>
            </div>
            <div class="chat-hour">{{ message.created_at }} <span class="fa fa-check-circle"></span></div>
        </li>
    </ul>
</template>
  
<script>
    export default {
      props:['user','allMessages'],
    }
</script>