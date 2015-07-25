<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h1><i class="icon-briefcase">&nbsp</i>Groups</h1>
        <ol class="list-unstyled">
            @foreach($allCategories as $category)
                <li>
                    @if($category->parent_id > 0)
                        &nbsp;&nbsp;&nbsp;--
                    @endif
                    <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar-module sidebar-module-inset">
        <h1><i class="icon-bell-alt">&nbsp</i>Hot</h1>
        <ol class="list-unstyled">
            @foreach($hottestArticles as $article)
                <li><a href="/{{ $article->slug }}">{{ $article->title }}</a></li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar-module sidebar-module-inset">
        <h1><i class="icon-cloud">&nbsp</i>New</h1>
        <ol class="list-unstyled">
            @foreach($newestArticles as $article)
                <li><a href="/{{ $article->slug }}">{{ $article->title }}</a></li>
            @endforeach
        </ol>
    </div>
    <div class="sidebar-module sidebar-module-inset">
        <h1><i class="icon-list">&nbsp</i>Sites</h1>
        <ol class="list-unstyled">
            <li><a href="http://grkin.cnblogs.com/">My Blog</a></li>
            <li><a href="http://www.youtube.com">Youtube</a></li>
            <li><a href="http://www.57kan.com">微阅读</a></li>
            <li><a href="http://www.baidu.com">Baidu</a></li>
            <li><a href="http://www.google.com">Google</a></li>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->
