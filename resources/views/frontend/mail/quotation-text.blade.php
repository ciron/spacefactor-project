@lang('strings.emails.quotation.email_body_title')

@lang('validation.attributes.frontend.name'): {{ $request->name }}
@lang('validation.attributes.frontend.phone'): {{ $request->phone ?? 'N/A' }}
@lang('validation.attributes.frontend.email'): {{ $request->email }}
@lang('validation.attributes.frontend.services'): {{ $request->services }}
@lang('validation.attributes.frontend.mood'): {{ $request->mood }}
@lang('validation.attributes.frontend.budget'): {{ $request->budget  }}
@lang('validation.attributes.frontend.preferred_style'): {{ $request->preferred_style}}
@lang('validation.attributes.frontend.how_did_you_find_us'): {{ $request->how_did_you_find_us}}
@lang('validation.attributes.frontend.project_address'): {{ $request->project_address}}
@lang('validation.attributes.frontend.message'): {{ $request->message}}
