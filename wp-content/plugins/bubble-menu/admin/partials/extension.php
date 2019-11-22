<?php
/**
 * Extansion version
 *
 * @package    Wow_Plugin
 * @subpackage
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<style>
	.feature-section.one-col p {
		font-size: 16px;
	}

	.faq-title {
		cursor: pointer;
	}

	.faq-title:before {
		content: "\f132";
		font-family: Dashicons;
		vertical-align: bottom;
		margin-right: 8px;
		color: #e95645;
	}

	.toggleshow:before {
		content: "\f132";
		font-family: Dashicons;
		color: #e95645
	}

	.togglehide:before {
		content: "\f460";
		font-family: Dashicons;
	}

	.item-title {
		margin: 1.25em 0 .6em;
		font-size: 1em;
		line-height: 1;
		color: #1e73be;
	}

	.items .inside {
		margin: 10px 10px 10px 20px;
	}

	.feature-section ul {
		margin-left: 10px;
	}

	.feature-section ul li:before {
		content: "\f147";
		font-family: Dashicons;
		margin-right: 5px;
		color: #e95645
	}

	.wow-btn {
		width: 380px;
		display: inline-block;
		height: 42px;
		background: #43cb83;
		border-radius: 3px;
		line-height: 42px;
		text-align: center;
		color: #fff !important;
		text-decoration: none;
		font-size: 18px;
		font-weight: 500;
		cursor: pointer;
		border: none;
	}

	.wow-btn:hover {
		background: #5cc38d;
	}

	.wow-btn-demo {
		width: 380px;
		display: inline-block;
		height: 42px;
		background: #1f9ef8;
		border-radius: 3px;
		line-height: 42px;
		text-align: center;
		color: #fff !important;
		text-decoration: none;
		font-size: 18px;
		font-weight: 500;
		cursor: pointer;
		border: none;
	}

	.wow-btn-demo:hover {
		background: #128be0;
	}

	.wow-btn .dashicons,
	.wow-btn-demo .dashicons {
		line-height: 42px;
		font-size: 24px;
	}
</style>

<script>
	jQuery(document).ready(function ($) {
		$('.item-title').children('.faq-title').click(function () {
			var par = $(this).closest('.items');
			$(par).children(".inside").toggle(500);
			if ($(this).hasClass('togglehide')) {
				$(this).removeClass('togglehide');
				$(this).addClass("toggleshow");
				$(this).attr('title', 'Show');
			} else {
				$(this).removeClass('toggleshow');
				$(this).addClass("togglehide");
				$(this).attr('title', 'Hide');
			}
		});
	})
</script>
<div class="about-wrap wow-support">
	<div class="feature-section one-col">
		<div class="col">

			<p>GET MORE FEATURES WITH THE PRO PLUGIN.</p>

			<p><a href="https://wow-estore.com/item/bubble-menu-pro/" target="_blank" class="wow-btn">Get Pro
					Version</a></p>

			<p><a href="https://wow-estore.com/preview/bubble-menu/pro.html" target="_blank" class="wow-btn-demo">Demo
					Pro
					Version</a></p>

			<p>ADDITIONAL OPTIONS IN PRO VERSION:</p>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Style</span>
				</div>
				<div class="inside" style="display: none;">
					<p>More settings for the overall menu style.</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Buttons shapes</span>
				</div>
				<div class="inside" style="display: none;">
					<p>4 different button shapes:</p>
					<ul>
						<li>Circle</li>
						<li>Rounded square</li>
						<li>Ellipse</li>
						<li>Square</li>
					</ul>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Animation</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Contains a large set of effects for the opening the menu. </p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Item Type</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Use additional item types</p>
					<ul>
						<li>Share - use 20 services for sharing the page: Facebook, Twitter, Linkedin, Google, XING,
							Pinterest, VK, Odnoklassniki, Myspace, Weibo, Buffer, StumbleUpon, Reddit, Tumblr, Blogger,
							LiveJournal, Pocket, Telegram, Skype, Email </li>
						<li>Print - send the current page to the printer</li>
						<li>Scroll to Top - the set function 'Go to Top' on the menu item </li>
						<li>Smooth Scroll - Smooth scrolling to set anchor on page</li>
						<li>Email - add a link for an email address with antispambot function</li>
						<li>Telephone - add a link for an telephone</li>
						<li>Login - add URL to login form</li>
						<li>Logout - add URL for logout</li>
						<li>Register - add a link to the registration form</li>
						<li>Lostpassword - add a link to the form for reset password</li>
					</ul>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Custom Icon</span>
				</div>
				<div class="inside" style="display: none;">
					<p>You can customize your own icon for the menu item. Upload your own icons and make your menu even
						more informative.</p>

				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Mobile and Desktop Screens</span>
				</div>
				<div class="inside" style="display: none;">
					<p>You can show and hide elements depending on the user's device, to be more precise, on the width
						of the
						user's screen.</p>
					<p>For example, you can hide items for a user if he logged in from a mobile phone or from a
						stationary
						computer, simply by specifying the width of the device.</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">User Target</span>
				</div>
				<div class="inside" style="display: none;">
					<p>You can customize display the item on the page depending on the role of the user who is on the
						site. You
						can configure targeting for such user groups:</p>
					<ul>
						<li>All users;</li>
						<li>Unauthorized users;</li>
						<li>Authorized users;</li>
						<li>The role of the authorized user on the site;</li>
						<ul>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Multi language</span>
				</div>
				<div class="inside" style="display: none;">
					<p>The condition for display the item depending on the language of the site.</p>
					<p>It is good to use if you have a website in several languages and you need to show different
						elements for a
						different language.</p>
				</div>
			</div>

			<div class="items itembox">
				<div class="item-title">
					<span class="faq-title">Target to content</span>
				</div>
				<div class="inside" style="display: none;">
					<p>Choose a condition to target your item to specific content or various other segments. You can
						display the
						item on:</p>
					<ul>
						<li>All posts and pages;</li>
						<li>Only posts;</li>
						<li>Only pages;</li>
						<li>Posts with certain IDs;</li>
						<li>Pages with certain IDs;</li>
						<li>Posts in Categorys with IDs;</li>
						<li>All posts, except;</li>
						<li>All pages, except;</li>
						<li>Taxonomy;</li>
						<ul>
				</div>
			</div>
		</div>
	</div>
</div>