<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>编辑 项目</title>
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
            {% include '/public/breadcrumb.volt' %}
            {% set links = [['href':'/project/index','name':'配置对象'],['name':'详情']] %}
            {{ breadcrumb(links) }}
            {% include '/project/infomcaro.volt' %}
            <div style="width: 95%;margin-left: 3%">
                <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PID</th>
                        <th>类型</th>
                        <th>名字(备注)</th>
                        <th>内容({{ctip[info.type]}})</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <th>{{info.id}}</th>
                        <th>{{info.pid}}</th>
                        <th>{{info.type}}({{ttip[info.type]}})</th>
                        <td>{{info.name}}({{info.remark}})</td>
                        <td>{{info.content}}</td>
                    </tr>
                  
                </tbody>

            </table>
            </div>
            <div style="width: 90%;">
                <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control"
                               value="{{info.name}}"  name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control" 
                                   value="{{info.remark}}" name="remark">
                        </div>
                    </div>
                    
                        
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control" 
                                   value="{{info.content}}" name="content">
                        </div>
                    </div>
                        <input type="hidden" name="id" value="{{info.id}}">
                        
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">
                            修改
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
               
            </div>
        </div>

    </body>
</html>