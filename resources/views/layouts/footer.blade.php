<footer class="bd-footer text-muted">
    <div class="@if(View::hasSection('notloggedinmenu')) container py-3 py-md-5 @else container-fluid p-3 p-md-5 @endif">
        <ul class="bd-footer-links">
            <li><a href="https://github.com/lostislandgov/egov-portal">GitHub</a></li>
            <li><a href="https://twitter.com/LostislandGov">Twitter</a></li>
            <li><a href="https://www.facebook.com/LostislandGov/?fref=ts">Facebook</a></li>
            <li><a href="https://www.instagram.com/lostislandgov/">Instagram</a></li>
            <li><a href="http://lostisland.org/our-team/">Our Team</a></li>
        </ul>
        <p>Designed and Build by the <a href="https://github.com/orgs/lostislandgov/people">IT Department of the Government of the Federal Republic of Lostisland</a>.</p>
        <p>Currently v{{env('APP_VERSION', '0.1Alpha')}}. Code licensed <a href="https://github.com/lostislandgov/egov-portal/blob/master/LICENSE" target="_blank" rel="license noopener">MIT</a>, Information in the Portal copyrighted &copy; <a href="http://lostisland.org" target="_blank" rel="license noopener">Government of the Federal Republic of Lostisland</a>.</p>
    </div>
</footer>