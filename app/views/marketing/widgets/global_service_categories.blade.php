<div class="row">
    <div class="col-md-10">
        <div class="services">
            <h4>Услуги</h4>
            <ul class="nav nav-tabs">
                <li role="presentation" {{ Session::get('sort', 'categories') == 'categories' ? 'class="active"' : '' }} >
                    <a href="#categories" aria-controls="categories" role="tab" data-toggle="tab">Категории</a>
                </li>
                <li role="presentation" {{ Session::get('sort', 'categories') == 'organizations' ? 'class="active"' : '' }}>
                    <a href="#organizations" aria-controls="organizations" role="tab" data-toggle="tab">Ведомства</a>
                </li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade{{ Session::get('sort', 'categories') == 'categories' ? ' in active' : '' }}" id="categories">
                    <ul class="list-unstyled">
                    @foreach ($global_service_categories as $category)
                        <li><a href="{{ action('Marketing\GlobalServiceCategoriesController@getShow', array('id' => $category->id)) }}">{{ $category->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
                
                <div role="tabpanel" class="tab-pane fade{{ Session::get('sort', 'categories') == 'organizations' ? ' in active' : '' }}" id="organizations">
                    <ul class="list-unstyled">
                    @foreach ($organizations as $organization)
                        <li><a href="{{ action('Marketing\OrganizationsController@getShow', array('id' => $organization->id)) }}">{{ $organization->title }}</a></li>
                    @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div role="tabpanel">

  

</div>