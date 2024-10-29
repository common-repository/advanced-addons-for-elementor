<#

        #>
       <div class="advanced_addons_social_links type-1">
                <div class="block-body">
                     <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <ul class="list-style-none pl-0 mb-0">
                                <# _.each(settings.profiles, function(profile, index) {
                                        var icon = profile.name,
                                            url = profile.link.url,
                                            linkKey = view.getRepeaterSettingKey( 'profile', 'profiles', index);

                                        if (profile.name === 'website') {
                                            icon = 'globe';
                                        } else if (profile.name === 'email') {
                                            icon = 'envelope'
                                            url = 'mailto:' + profile.email;
                                        }

    
                                        view.addRenderAttribute( linkKey, 'href', url ); 
                                #>
                                  <li>
                                    <span class="block_icon">
                                      <i class="fa fa-{{icon}}"></i>
                                    </span>
                                    <span class="block_label">
                                      <a {{{view.getRenderAttributeString( linkKey )}}}>{{ profile.name }}</a>
                                    </span>
                                    <span class="block_link">
                                      {{url}}
                                    </span>
                                  </li>
                                  <# }); #>
							              </ul>
                        </div>
                    </div>
                </div>
            </div>