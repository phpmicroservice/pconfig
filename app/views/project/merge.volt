<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>项目合并的详情</title>
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
            
           
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PID</th>
                        <th>类型</th>
                        <th>名字(备注)</th>
       
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>
                        <th>{{info.id}}</th>
                        <th>{{info.pid}}</th>
                        <th>{{info.type}}</th>
                        <td>{{info.name}}({{info.remark}})</td>                        
                    </tr>
                </tbody>
            </table>
            <div>
                <div class="alert alert-success" role="alert">合并自</div>
            </div>
                    
            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PID</th>
                        <th>类型</th>
                        <th>名字(备注)</th>
       
                    </tr>
                </thead>
                <tbody>
                   {% for info in mlist %}
                    <tr>
                        <th>{{info.id}}</th>
                        <th>{{info.pid}}</th>
                        <th>{{info.type}}</th>
                        <td>{{info.name}}({{info.remark}})</td>
                       
                        
                    </tr>
                   {% endfor %}
                </tbody>

            </table>
                    
            <div>
                <div class="alert alert-info" role="alert">合并后内容为:</div>
            </div>
            
            {{ prijectinfo(content)}}
           
    </body>
</html>