			</div> <!-- content -->
            <span class = "released-games">released games</span>
		    <div id = "carousel">
		        
                <ul id = "scroller">
                <?php for ($i = 1; $i < 19; $i++) : ?>
                    <li>
                        <a href="">
                        	<img src="<?= BASE_URL ?>img/games-pic-little/<?= $i ?>.jpg" alt="" />  
                        </a>
                    </li>
                <?php endfor; ?>
                </ul>
                
				<!--	
				<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="950" height="52" id="scroller2" align="middle">
					  <param name="allowScriptAccess" value="sameDomain" />
					  <param name="movie" value="<?= BASE_URL ?>img/scroller2.swf?dir=<?= BASE_URL ?>"/>
					  <param name="wmode" value="transparent">
					  <param name="quality" value="high" />
	
					  <param name="bgcolor" value="#ffffff" />
					  <embed src="<?= BASE_URL ?>img/scroller2.swf" quality="high" bgcolor="#000000" width="950" height="52" name="scroller2" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />      
				</object>
                -->
		    </div> <!-- carousel -->
		</div> <!-- container -->
		
		<div id="footer">
		    <div class = "cols">
		        
                <div class = "col-1">
                    <a href="mailto:invictus@invictus.hu"><img src="<?= BASE_URL ?>img/mail-to.png" border="0" /></a>
                    <br />
                    <img src="<?= BASE_URL ?>img/mail-to-refl.png" border="0" style="border:none;" />
                </div>
                <div class = "col-2">
                    &copy; 2007. | all rights reserved.<br />
                    Invictus-Games Ltd.<br />
                    9. Kartacs str., Debrecen 4032; phone/fax: 36-52/485-034
                </div>                
                
		    </div>
		    
			
		</div> <!-- footer -->
		<script type="text/javascript" charset="utf-8">
		    $(function() {
		        $('#content').jScrollPane({showArrows:false}); 
		        
		        /*
		        $('#carousel').jCarouselLite({
                    auto: 1000,
                    speed: 1000,
                    visible: 9,
                    circular:true
                });
                */
				
				$jScroller.add("#carousel","#scroller","left",7, true);
				$jScroller.start();

                
		    });
		</script>
		
	</body>

</html>
 