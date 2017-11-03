        <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<p>
						<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="20" />
						<input type="submit" id="searchsubmit" value="Ir" />
						</p>
		</form>