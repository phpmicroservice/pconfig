<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> 继承项目  比对</title>
        {% include '/public/head.volt' %}
    </head>
    <body>
        <div>
            {#            导航#}
            {% include '/public/nav.volt' %}
            
            
            
            
            {% include '/public/breadcrumb.volt' %}
            {% set links = [['href':'/project/index','name':'配置对象'],['name':'比对']] %}
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
                  <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active">
                      <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                          自己
                      </a>
                  </li>
                  <li role="presentation">
                      <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                          继承对象
                      </a>
                  </li>
                     </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                         {{ prijectinfo(content)}}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile">
                         {{ prijectinfo(mcontent)}}
                    </div>

                </div>
            </div>
            
                        
           
          
    </body>
</html>