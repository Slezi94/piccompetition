<template>
    <b-alert
        :show="dismissCountDown"
        dismissible
        variant="warning"
        @dismissed="dismissCountDown=0"
        @dismiss-count-down="countDownChanged"
        >
        This alert will dismiss after {{ dismissCountDown }} seconds...
    </b-alert>
</template>
<script>
export default {   
    data(){
        return{
            dismissSecs: 5,
            dismissCountDown: 0,
            showDismissibleAlert: false
        }
    },
    methods:{
        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },

        showAlert() {
            this.dismissCountDown = this.dismissSecs
        },

        
    },
    mounted() {
        this.$root.$on('showAlertEvent', function(){
            this.showAlert()
        })
    }
}
</script>