$.StoreCamp.sidebar =
  o:
    sidebar: 'site_sidebar'
    toggler: 'sidebar-nav-trigger'
  activate:() ->
    _this = this
    _this.toggleSidebar()
  toggleSidebar: () ->
    _this = this
    $(".#{_this.o.toggler}").click (e) ->
      e.preventDefault()
      sidebar = $(".#{_this.o.sidebar}")
      if sidebar.hasClass('active')
        sidebar.removeClass('active').addClass('hidden')
      else
        sidebar.removeClass('hidden').addClass('active')

$.StoreCamp.sidebar.activate()