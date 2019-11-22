<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>登录 - {{ sitename }}</title>
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}

            
            <div>
                <br><br><br><br>
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">登录名</label>
                        <div class="col-sm-10">
                            <input type="string" name="username" class="form-control" 
                                   placeholder="登录名,默认 admin">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control"
                                   placeholder="密码,默认 123456">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                                登录
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>


    </body>
</html>