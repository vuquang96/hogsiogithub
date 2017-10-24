<template>
    <div class="container">
        <!-- TOP PAGE -->
        <div class="receive-message message-box">
            <h5 class="mt-5 mb-3">マッサージを受けたい人</h5>
            <a href="" title="" class="btn btn-danger btn-block pt-3 pb-3">ログイン</a>
            <a href="" title="" class="btn btn-danger btn-block pt-3 pb-3">新規登録</a>
        </div>

        <div class="message-box">
            <h5 class="mt-5 mb-3">マッサージを行う人</h5>
            <a href="" title="" class="btn btn-primary btn-block pt-3 pb-3">ログイン</a>
            <a href="" title="" class="btn btn-primary btn-block pt-3 pb-3">新規登録</a>
        </div>
    </div>
</template>

<script>
    import {siteName} from './../../config';

    export default {
        name: 'home',
        data() {
            return {
                siteName: siteName
            }
        },
        components: {}
    }
</script>
