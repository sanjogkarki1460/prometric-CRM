<template>
    <div class="nav navbar-nav pull-left">
        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
               data-close-others="true">
                <i class="fa fa-bell-o"><span class="badge">{{unreadNotifications.length}}</span></i>
            </a>
            <ul class="dropdown-menu">
                <li class="external">
                    <h3><span class="bold">Notifications</span></h3>
                </li>
                <li>
                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                        <li>
                            <notification-itme v-for="unreads in unreadNotifications"></notification-itme>
                            <a :href="threadUrl"><span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
                                                            class="fa fa-check"></i></span>
                                                    {{unreads.data.thread.id}} </span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </div>
</template>

<script>
    export default {
        props: ['unreads','userid'],
        data(){
            return{
                unreadNotifications:this.unreads,
            }
        },
        mounted() {
            console.log('Component mounted');
            Echo.private('App.Admin.Admin' + this.userId)
                .notification((notification) => {
                    console.log(notification);
                    let newUnread={data:{thread: notification.thread, message:notification.message}};
                    this.unreadNotifications.push(newUnread);
                });
        }
    }
</script>