{%- macro project_action(item) %}

    <div class="paciton">
        {% if item.pid %}
            <a class="btn btn-primary" href="/project/index?pid={{ item.pid }}">
                父级对象
            </a>
            &nbsp;&nbsp;&nbsp;
        {% endif %}

        <a class="btn btn-warning" href="{{ url('/project/edit',['id':item.id]) }}">编辑</a>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-info" href="{{ url('/project/delete',['id':item.id]) }}">删除</a>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-success" href="{{ url('/project/add',['pid':item.id]) }}">增加下级配置</a>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-warning" href="{{ url('/project/index',['pid':item.id]) }}">
            关联对象
        </a>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-primary" href="{{ url('/project/index',['pid':item.id,'only_sub':1]) }}">
            下级对象
        </a>

        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-default" href="{{ url('/project/output',['id':item.id]) }}">
            输出
        </a>
    </div>

{%- endmacro %}
