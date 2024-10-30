<?php

# News home
if (!isset($action)) {
	print'
		<h1>News</h1>
		<div class="news">
			<a href="index.php?menu=2&action=1"><img src="news/news-3-1.jpg" alt="Guardians of the Galaxy OST 3" title="Guardians of the Galaxy OST 3"></a>
			<h2><a href="index.php?menu=2&action=1">Guardians of the Galaxy OST vol. 3 is here!</a></h2>
			<p>Guardians of the Galaxy Vol. 3: Awesome Mix Vol. 3 is the soundtrack album for the Marvel Studios film Guardians of the Galaxy Vol. 3. <a href="index.php?menu=2&action=1">More ...</a></p>
			<p><time datetime="2024-10-13">13 October 2024</time></p>
			<hr>
			<a href="index.php?menu=2&action=2"><img src="news/news-2-1.jpg" alt="Uzumaki by Junji Ito" title="Uzumaki by Junji Ito"></a>
			<h2><a href="index.php?menu=2&action=2">Read recommendation: Uzumaki by Junji Ito</a></h2>
			<p>Uzumaki is a Japanese horror manga series written and illustrated by Junji Ito. <a href="index.php?menu=2&action=2">More ...</a></p>
			<p><time datetime="2024-10-13">13 October 2024</time></p>
			<hr>
			<a href="index.php?menu=2&action=3"><img src="news/news-1-1.jpg" alt="Cross Stitching" title="Cross Stitching"></a>
			<h2><a href="index.php?menu=2&action=3">Introduction to cross stitching</a></h2>
			<p>Cross stitching is a form of sewing and a popular form of counted-thread embroidery in which X-shaped stitches in a tiled, raster-like pattern are used to form a picture. <a href="index.php?menu=2&action=3">More ...</a></p>
			<p><time datetime="2024-10-13">13 October 2024</time></p>
			<hr>
		</div>';
}

# News3
else {
	if ($action == 1) {
		$_SESSION['news_title_1'] = 'Guardians of the Galaxy OST vol. 3 is here!';
	print'
		<h1>News</h1>
		<div id="news_gallery">
			<figure id="1">
				<a href="news/news-3-2.jpg" target="_blank"><img src="news/news-3-2.jpg" alt="Official poster for the movie" title="Official poster for the movie"></a>
				<figcaption>Official poster for the movie.<figcaption>
			</figure>
			<figure id="2">
				<a href="news/news-3-1.jpg" target="_blank"><img src="news/news-3-1.jpg" alt="Official cover for GotG OST vol. 3" title="Official cover for GotG OST vol. 3"></a>
				<figcaption>Official cover for GotG OST vol. 3.<figcaption>
			</figure>
			<figure id="3">
				<a href="news/news-3-3.jpg" target="_blank"><img src="news/news-3-3.jpg" alt="Screenshot from the movie" title="Screenshot from the movie"></a>
				<figcaption>Screenshot from the movie.<figcaption>
			</figure>
		</div>
		<div class="news" style="margin-top: 38%">
			<h2>Guardians of the Galaxy OST vol. 3 is here!</h2>
			<p class="description">The guardians are back with again an awesome mixtape!</p>
			<p>Guardians of the Galaxy Vol. 3: Awesome Mix Vol. 3 (Original Motion Picture Soundtrack) is the <b>soundtrack album</b> for the Marvel Studios film Guardians of the Galaxy Vol. 3. Featuring the songs present on Peter Quill\'s Zune in the film, the album was released by Hollywood Records on <b>May 3, 2023</b>.</p>
			<p>Here\'s a table of songs you can expect to hear:</p>
		</div>
		<div class="table" style="margin-left: 20px">
			<table id="songs" style="width:100%">
				<tr>
					<th>Title</th>
					<th>Artist</th>
				</tr>
				<tr>
					<td>"Creep" (Acoustic Version)</td>
					<td>Radiohead</td>
				</tr>
				<tr>
					<td>"Crazy on You"</td>
					<td>Heart</td>
				</tr>
				<tr>
					<td>"Since You Been Gone"</td>
					<td>Rainbow</td>
				</tr>
				<tr>
					<td>"In the Meantime"</td>
					<td>Spacehog</td>
				</tr>
				<tr>
					<td>"Reasons"</td>
					<td>Earth, Wind & Fire</td>
				</tr>
				<tr>
					<td>"Do You Realize??"</td>
					<td>The Flaming Lips</td>
				</tr>
				<tr>
					<td>"We Care a Lot"</td>
					<td>Faith No More</td>
				</tr>
				<tr>
					<td>"Koinu no Carnival" (From "Minute Waltz")</td>
					<td>EHAMIC</td>
				</tr>
				<tr>
					<td>"I\'m Always Chasing Rainbows"</td>
					<td>Alice Cooper</td>
				</tr>
				<tr>
					<td>"San Francisco"</td>
					<td>The Mowgli\'s</td>
				</tr>
				<tr>
					<td>"Poor Girl"</td>
					<td>X</td>
				</tr>
				<tr>
					<td>"This Is the Day"</td>
					<td>The The</td>
				</tr>
				<tr>
					<td>"No Sleep till Brooklyn"</td>
					<td>Beastie Boys</td>
				</tr>
				<tr>
					<td>"Dog Days Are Over"</td>
					<td>Florence and the Machine</td>
				</tr>
				<tr>
					<td>"Badlands"</td>
					<td>Bruce Springsteen</td>
				</tr>
				<tr>
					<td>"I Will Dare"</td>
					<td>The Replacements</td>
				</tr>
				<tr>
					<td>"Come and Get Your Love"</td>
					<td>Redbone</td>
				</tr>
			  </table>
			</div>
			<div class="news">
				<p><b>Source:</b> <a href="https://en.wikipedia.org/wiki/Guardians_of_the_Galaxy_Vol._3_(soundtrack)" target="_blank">Wikipedia</a></p>
				<p><a href="index.php?menu=2">Click here to go back to news!</a></p>
			</div>';
}

# News2

else if ($action == 2) {
	$_SESSION['news_title_2'] = 'Read recommendation: Uzumaki by Junji Ito';
	print'
		<h1>News</h1>
		<div id="news_gallery">
			<figure id="1">
				<a href="news/news-2-1.jpg" target="_blank"><img src="news/news-2-1.jpg" alt="Front cover of Uzumaki" title="Front cover of Uzumaki"></a>
				<figcaption>Front cover of Uzumaki.<figcaption>
			</figure>
			<figure id="2">
				<a href="news/news-2-2.jpg" target="_blank"><img src="news/news-2-2.jpg" alt="Junji Ito, the author" title="Junji Ito, the author"></a>
				<figcaption>Junji Ito, the author.<figcaption>
			</figure>
			<figure id="3">
				<a href="news/news-2-3.jpg" target="_blank"><img src="news/news-2-3.jpg" alt="Main character Kirie Goshima" title="Main character Kirie Goshima"></a>
				<figcaption>Main character Kirie Goshima.<figcaption>
			</figure>
			<figure id="4">
				<a href="news/news-2-4.jpg" target="_blank"><img src="news/news-2-4.jpg" alt="Famous illustration from Uzumaki" title="Famous illustration from Uzumaki"></a>
				<figcaption>Famous illustration from Uzumaki.<figcaption>
			</figure>
		</div>
		<div class="news" style="margin-top: 38%">
			<h2>Read recommendation: Uzumaki by Junji Ito</h2>
			<p class="description">Dive into the world of spirals!</p>
			<p>Uzumaki (うずまき, lit. \'Spiral\') is a Japanese <b>horror manga</b> series written and illustrated by <b>Junji Ito</b>.</p>
			<p>Appearing as a <b>serial</b> in Shogakukan\'s weekly seinen manga magazine Big Comic Spirits <b>from 1998 to 1999</b>, the chapters were compiled into three bound volumes published from August 1998 to September 1999. In March 2000, Shogakukan released an omnibus edition, followed by a second omnibus version in August 2010. In North America, Viz Media serialized an English-language translation of the series in its monthly magazine Pulp from February 2001 to August 2002. Viz Media then published the volumes from October 2001 to October 2002, with a re-release from October 2007 to February 2008, and published a hardcover <b>omnibus</b> edition in <b>October 2013</b>.</p>
			<p>The series tells the story of the citizens of Kurouzu-cho, a fictional town which is plagued by <b>a supernatural curse involving spirals</b>. The story for Uzumaki originated when Ito attempted to write a story about people living in a very long terraced house, and he was inspired to use a spiral shape to achieve the desired length. Ito believes the horror of Uzumaki is effective due to its subversion of symbols which are positively portrayed in Japanese media, and its theme of protagonists struggling against <b>a mysterious force</b> stronger than themselves.</p>
			<p>Uzumaki continues to receive critical acclaim, deemed by many as Ito\'s <b>magnum opus</b>. The manga has received generally positive reviews from English-language critics. It was nominated for an Eisner Award in 2003, and placed in the Young Adult Library Services Association\'s list of the "Top 10 Graphic Novels for Teens" in 2009.</p>
			<p>In 2000, the manga was adapted into two <b>video games</b> for the WonderSwan and a Japanese <b>live-action film</b> directed by Higuchinsky. An <b>anime television series</b> adaptation co-produced by Production I.G USA and Adult Swim premiered in September 2024 in the United States on Adult Swim\'s Toonami programming block.</p>
			<p><b>Source:</b> <a href="https://en.wikipedia.org/wiki/Uzumaki" target="_blank">Wikipedia</a></p>
			<p><a href="index.php?menu=2">Click here to go back to news!</a></p>
		</div>';
}

# News1
else if ($action == 3) {
	$_SESSION['news_title_3'] = 'Introduction to cross stitching';
	print'
		<h1>News</h1>
		<div id="news_gallery">
			<figure id="1">
					<a href="news/news-1-1.jpg" target="_blank"><img src="news/news-1-1.jpg" alt="Closeup of cross stitching" title="Closeup of cross stitching"></a>
					<figcaption>Closeup of cross stitching.<figcaption>
			</figure>
			<figure id="2">
				<a href="news/news-1-2.jpg" target="_blank"><img src="news/news-1-2.jpg" alt="Cross stitch of a plant." title="Cross stitch of a plant."></a>
				<figcaption>Cross stitch of a plant.<figcaption>
			</figure>
			<figure id="3">
				<a href="news/news-1-3.jpg" target="_blank"><img src="news/news-1-3.jpg" alt="Cross stitch of a bird with back stitching." title="Cross stitch of a bird with back stitching."></a>
				<figcaption>Cross stitch of a bird with back stitching.<figcaption>
			</figure>
			<figure id="4">
				<a href="news/news-1-4.jpg" target="_blank"><img src="news/news-1-4.jpg" alt="Cross stitch supplies." title="Cross stitch supplies."></a>
				<figcaption>Cross stitch supplies.<figcaption>
			</figure>
		</div>
		<div class="news" style="margin-top: 38%">
			<h2>Introduction to cross stitching</h2>
			<p class="description">Here\'s everything you need to know about cross stitching!</p>
			<p>Cross stitching is a form of <b>sewing</b> and a popular form of counted-thread <b>embroidery</b> in which X-shaped stitches in a tiled, raster-like pattern are used to form a picture.</p>
			<p>The stitcher counts the threads on a piece of evenweave fabric (such as <b>linen</b>) in each direction so that the stitches are of uniform size and appearance. This form of cross-stitch is also called counted cross-stitch in order to distinguish it from other forms of cross-stitch.</p>
			<p>Sometimes cross-stitch is done on designs printed on the fabric (stamped cross-stitch); the stitcher simply stitches over the printed pattern.</p>
			<p>Cross-stitch is often executed on easily countable fabric called <b>aida cloth</b>, whose weave creates a plainly visible grid of squares with holes for the needle at each corner.</p>
			<p>The cross-stitch can be executed partially such as in quarter-, half-, and three-quarter-stitches. A single straight stitch, done in the form of <b>backstitching</b>, is often used as an outline, to add detail or definition.</p>
			<p><b>Source:</b> <a href="https://en.wikipedia.org/wiki/Cross-stitch" target="_blank">Wikipedia</a></p>
			<p><a href="index.php?menu=2">Click here to go back to news!</a></p>
		</div>';
	}
}

?>