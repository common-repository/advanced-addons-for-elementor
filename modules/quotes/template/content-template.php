<#
       
       #>
       <# if (settings.style === 'style1') { #>
        <div class="advanced_addons_quotes_card type-1 bg-2f2f2f">
					<blockquote>
						<h5 class="text-white font-weight-normal q-title">
						  <i class="fa fa-quote-right quotes-icon"></i>
							{{settings.title}}
						</h5>
						<p class="q-desc">
							{{settings.desc}}
						</p>
					</blockquote>
		</div>
         <# } #>
        <# if (settings.style === 'style2') { #>
        <div class="advanced_addons_quotes_card type-2 bg-white">
						<blockquote>
							<h5 class="text-2f2f2f font-weight-normal fz-26 q-title">
								<i class="fa fa-quote-right quotes-icon"></i>
								{{settings.title}}
							</h5>
							<p class="q-desc">
								{{settings.desc}}
							</p>
							<span class="auth">
								{{settings.author}}
							</span>
						</blockquote>
		</div>
       <# } #>