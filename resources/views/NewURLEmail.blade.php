<div
    style="width:100%; max-width:600px; margin:0 auto; background-color:#ffffff; border-radius:8px; overflow:hidden; font-family:Arial, sans-serif; color:#1f2937;">
    <!-- Header -->
    <div style="background-color:#3b82f6; padding:20px; text-align:center; color:#ffffff;">
        <h1 style="margin:0; font-size:24px;">New URL Created!</h1>
    </div>
    <!-- Content -->
    <div style="padding:20px;">
        <p style="margin:0 0 16px;">Hi {{ $name }},</p>
        <p style="margin:0 0 16px; line-height:1.5;">
            Thank you for using our URL Shortener service! Your new URL has been created successfully.
        </p>
        <p style="margin:0 0 16px; line-height:1.5;">
            <strong>Original URL:</strong> {{ $longURL }}
        </p>
        <p style="margin:0 0 16px; line-height:1.5;">
            <strong>Short URL:</strong>
            <a href="/{{ $shortURL }}" style="color:#3b82f6; text-decoration:none;">
                {{ $shortURL }}
            </a>
        </p>
        <p style="text-align:center; margin:0 0 16px;">
            <a href="{{ url('/') }}"
                style="display:inline-block; background-color:#3b82f6; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:4px; font-weight:bold;">
                Visit Homepage
            </a>
        </p>
        <p style="margin:0; line-height:1.5;">Cheers,<br>The URL Shortener Team</p>
    </div>
    <!-- Footer -->
    <div style="background-color:#f3f4f6; text-align:center; padding:10px; font-size:12px; color:#6b7280;">
        <p style="margin:0;">&copy; {{ date('Y') }} URL Shortener. All rights reserved.</p>
    </div>
</div>
