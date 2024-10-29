<#
        view.addInlineEditingAttributes( 'title', 'none' );
        view.addRenderAttribute( 'title', 'class', 'font-weight-normal text-2f2f2f fz-20 ad-title' );
        #>
            <div class="advanced_addons_devider type-1 position-relative">
				        <# if (settings.title) { #>
                    <{{ settings.title_tag }} {{{ view.getRenderAttributeString( 'title' ) }}}>{{ settings.title }}</{{ settings.title_tag }}>
                <# } #>
              <p class="mb-0 aae-desc">
                          {{settings.description}}
              </p>
                 <div class="advanced_addons_devider_line"></div>
			    </div>