<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>增加 ALC</title>
    {% include '/public/head.volt' %}
</head>

<body>
    <div id='app'>
        {#            导航#}
        {% include '/public/nav.volt' %}
        {% include '/public/breadcrumb.volt' %}
        {% set links = [['href':'/alc/index','name':'ALC'],['name':'增加']] %}
        {{ breadcrumb(links) }}
        {% include '/project/infomcaro.volt' %}

        <div style="width: 90%;">
            <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">类型</label>
                    <div class="col-sm-10">
                        <select name="type" v-model='type'>
                            {% for key,vall in alc_type %}
                            <option value="{{key}}">{{vall}}</option>
                            {% endfor %}
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">内容</label>
                    <div class="col-sm-4">
                        <input type="string" class="form-control" v-model="content" value="{{info.content}}"
                            name="content">
                    </div>

                    <div class="col-sm-6">
                        <div v-if='type == "token" || type == "sign"'>

                            <button type="button" @click="token" class="btn btn-default">
                                生成
                            </button>
                        </div>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">
                            增加
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div>

        </div>
    </div>

    <script>

        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!',
                type: 'ip',
                content: ''
            },
            methods: {
                token() {
                    this.content = randomString(32);
                }
            }
        })
    </script>

</body>

</html>