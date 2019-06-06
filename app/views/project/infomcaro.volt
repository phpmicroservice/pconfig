
{%- macro prijectinfo(content) %}

<div>
    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>名字</th>
                <th>内容</th>
            </tr>
        </thead>
        <tbody>
            {% for key,value in content %}
            <tr>
                <th>{{key}}</th>
                <th>
                   
                    {% if value is type('array') %}
                       
                        {{ prijectinfo2(value)}}
                    {% else %}
                        {{value}}
                    {% endif %}
                </th>
                
            </tr>
            {% endfor %}
        </tbody>
    </table>

    
</div>

{%- endmacro %}
{%- macro prijectinfo2(content) %}
   <div>
       <table class="table table-bordered table-hover">
        <tbody>
{% for key,value in content %}
 
        
    
<tr>
    <th>{{key}}</th>
    <th>

        {% if value is type('array') %}
            {{ prijectinfo2(value)}}
        {% else %}
            {{value}}
        {% endif %}
    </th>

</tr>

{% endfor %}
      </tbody>
    </table>

</div>
{%- endmacro %}