
        <#
        view.addInlineEditingAttributes( 'title', 'none' );
        view.addRenderAttribute( 'title', 'class', 'text-2f2f2f fz-20 font-weight-normal text-uppercase mb-0');
        #>
        <button class="advanced_addons_btn advanced_addons_btn_bordered btn_default">
               <a href="{{{settings.link.url}}}" class="ad-btn"> 
               
                <# if ( 'yes' === settings.show_icon ) { #>
                       <# if (settings.icon) { #>
                            <i class="{{{settings.icon}}}"></i>
                        <# } #>
                    <# } #>
                {{ settings.text }}
                </a>
        </button>

        