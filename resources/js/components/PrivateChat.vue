<template>
    <div class="content-wrapper">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="row no-gutters">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="users">
                                    <li class="person" data-chat="person1">
                                        <div class="user">
                                            <img src="dist/img/logo-gv.png" alt="User">
                                            <span class="status away"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">Nhóm công ty</span>
                                        </p>
                                    </li>
                                    
                                    <li class="person" data-chat="person1" v-for="friend in friends"
                                        :style="(friend.id==activeFriend)?'background-color:#6CCED6':''"
                                        :key="friend.id"
                                        @click="activeFriend=friend.id"
                                    >
                                        <div class="user">
                                            <img v-if="friend.staff" :src="'images/avatar/' + friend.staff.avatar" alt="User">
                                            <img v-else src="https://www.seekpng.com/png/detail/46-463314_v-th-h-user-profile-icon.png" alt="User">
                                            <span class="status away"></span>
                                        </div>
                                        <p class="name-time">
                                            <span class="name">{{friend.name}}</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
                            <div class="selected-user">
                                <span>To: <span class="name">Người dùng</span></span>
                            </div>
                            <div class="chat-container messages" id="privateMessageBox" xs9>
                                <message-list :user="user" :all-messages="allMessages"></message-list>
                                <div class="floating-div">
                                    <picker v-if="emoStatus" set="emojione" @select="onInput" title="Pick your emoji…" />
                                </div>
                            </div>
                            <div class="flex-grow-0 py-3 px-4 border-top d-flex flex-row bd-highlight mb-3">
                                <div class="row input-group d-flex">
                                    <button @click="toggleEmo" fab dark small color="pink" style="border: none;">
                                        <i class="far fa-smile-wink" style="font-size: 30px;"></i>
                                    </button>

                                    <input
                                        id="btn-input"
                                        type="text"
                                        rows=2
                                        name="message"
                                        class="form-control input-sm"
                                        v-model="message"
                                        label="Enter Message"
                                        single-line
                                        @keyup.enter="sendMessage"
                                    >

                                    <button class="btn btn-primary" id="btn-chat" small color="green" @click="sendMessage">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import MessageList from './_message-list'
    import { Picker } from 'emoji-mart-vue'
    export default {
        props:['user'],
        components:{
            Picker,
            MessageList
        },
        
        data () {
            return {
                message:null,
                files:[],
                activeFriend:null,
                typingFriend:{},
                onlineFriends:[],
                allMessages:[],
                typingClock:null,
                emoStatus:false,
                users:[],
              // token:document.head.querySelector('meta[name="csrf-token"]').content
            }
        },

        computed:{
            friends(){
                return this.users.filter((user)=>{
                    return user.id !==this.user.id;
                })
            }
        },

        watch:{
            files:{
                deep:true,
                handler(){
                    let success=this.files[0].success;
                    if(success){
                        this.fetchMessages();
                    }
                }
            },

            activeFriend(val){
                this.fetchMessages();
            },

            '$refs.upload'(val){
                console.log(val);
            }
        },

        methods:{
            onTyping(){
                Echo.private('privatechat.'+this.activeFriend).whisper('typing',{
                    user:this.user
                });
            },

            sendMessage(){
                //check if there message
                if(!this.message){
                    return alert('Vui lòng nhập tin nhắn');
                }

                if(!this.activeFriend){
                    return alert('Vui lòng chọn đối tượng chat');
                }

                axios.post('/private-messages/'+this.activeFriend, {message: this.message}).then(response => {
                            this.message=null;
                            this.allMessages.push(response.data.message)
                            setTimeout(this.scrollToEnd,100);
                });
            },

            fetchMessages() {
                if(!this.activeFriend){
                    return alert('Please select friend');
                }
                axios.get('/private-messages/'+this.activeFriend).then(response => {
                    this.allMessages = response.data;
                    setTimeout(this.scrollToEnd,100);
                });
            },

            fetchUsers() {
                axios.get('/users-chat').then(response => {
                    this.users = response.data;
                    if(this.friends.length>0){
                      this.activeFriend=this.friends[0].id;
                    }
                });
            },

            scrollToEnd(){
                document.getElementById('privateMessageBox').scrollTo(0,99999);
            },

            toggleEmo(){
                this.emoStatus= !this.emoStatus;
            },

            onInput(e){
              if(!e){
                  return false;
              }
              if(!this.message){
                  this.message=e.native;
              }else{
                  this.message=this.message + e.native;
              }

              this.emoStatus=false;
            },
            
            onResponse(e){
                console.log('onrespnse file up',e);
            }
        
        },

        mounted(){
        },

        created(){
            this.fetchUsers();
            Echo.join('plchat')
            .here((users) => {
                console.log('online',users);
                this.onlineFriends=users;
            })

            .joining((user) => {
                this.onlineFriends.push(user);
                console.log('joining',user.name);
            })

            .leaving((user) => {
                this.onlineFriends.splice(this.onlineFriends.indexOf(user),1);
                console.log('leaving',user.name);
            });
          
            Echo.private('privatechat.'+this.user.id)
                .listen('PrivateMessageSent',(e)=>{
                    console.log('pmessage sent')
                    this.activeFriend=e.message.user_id;
                    this.allMessages.push(e.message)
                    setTimeout(this.scrollToEnd,100);
                })

                .listenForWhisper('typing', (e) => {
                    if(e.user.id==this.activeFriend){
                        this.typingFriend=e.user;
                        
                        if(this.typingClock) clearTimeout();
                          this.typingClock=setTimeout(()=>{
                                        this.typingFriend={};
                                    },9000);
                    }
                });
        }
    }
</script>