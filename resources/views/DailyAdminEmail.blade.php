<div
    style="width:100%; max-width:600px; margin:0 auto; background-color:#ffffff; border-radius:8px; overflow:hidden; font-family:Arial, sans-serif; color:#1f2937;">
    <!-- Header -->
    <div style="background-color:#3b82f6; padding:20px; text-align:center; color:#ffffff;">
        <h1 style="margin:0; font-size:24px;">Daily Admin Report</h1>
    </div>
    <!-- Content -->
    <div style="padding:20px;">
        <p style="margin:0 0 16px; line-height:1.5;">Hello Admin,</p>
        <p style="margin:0 0 16px; line-height:1.5;">
            Here is your daily summary for {{ date('F j, Y') }}:
        </p>
        <ul style="list-style:none; padding:0; margin:0 0 16px;">
            <li style="margin-bottom:8px;"><strong>Total URLs:</strong> {{ $totalUrls }}</li>
            <li style="margin-bottom:8px;"><strong>Total Clicks:</strong> {{ $totalClicks }}</li>
            <li style="margin-bottom:8px;"><strong>Active Users:</strong> {{ $activeUsers }}</li>
            <li style="margin-bottom:8px;"><strong>New Registrations:</strong> {{ $newRegistrations }}</li>
            <li style="margin-bottom:8px;"><strong>New URLs Today:</strong> {{ $newUrlsToday }}</li>
        </ul>
        <p style="margin:0 0 16px; line-height:1.5;">
            For more detailed analytics, please visit your admin panel.
        </p>
        <p style="text-align:center; margin:0 0 16px;">
            <a href="{{ url('/siteadmin') }}"
                style="display:inline-block; background-color:#3b82f6; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:4px; font-weight:bold;">
                View Admin Panel
            </a>
        </p>
        <p style="margin:0; line-height:1.5;">Best regards,<br>Your URL Shortener Team</p>
    </div>
    <!-- Footer -->
    <div style="background-color:#f3f4f6; text-align:center; padding:10px; font-size:12px; color:#6b7280;">
        <p style="margin:0;">&copy; {{ date('Y') }} URL Shortener. All rights reserved.</p>
    </div>
</div>
