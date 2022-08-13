<p>@lang('strings.emails.quotation.email_body_title')</p>

<p><strong>@lang('validation.attributes.frontend.name'):</strong> {{ $request->name }}</p>
<p><strong>@lang('validation.attributes.frontend.phone'):</strong> {{ $request->phone ?? 'N/A' }}</p>
<p><strong>@lang('validation.attributes.frontend.email'):</strong> {{ $request->email }}</p>
<p><strong>@lang('validation.attributes.frontend.services'):</strong> {{ $request->services }}</p>
<p><strong>@lang('validation.attributes.frontend.mood'):</strong> {{ $request->mood }}</p>
<p><strong>@lang('validation.attributes.frontend.budget'):</strong> {{ $request->budget  }}</p>
<p><strong>@lang('validation.attributes.frontend.preferred_style'):</strong> {{ $request->preferred_style}}</p>
<p><strong>@lang('validation.attributes.frontend.how_did_you_find_us'):</strong> {{ $request->how_did_you_find_us}}</p>
<p><strong>@lang('validation.attributes.frontend.project_address'):</strong> {{ $request->project_address}}</p>
<p><strong>@lang('validation.attributes.frontend.message'):</strong> {{ $request->message}}</p>
