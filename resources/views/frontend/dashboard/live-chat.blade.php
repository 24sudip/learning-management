<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
@extends('frontend.dashboard.user-dashboard')

@section('user_content')
<div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
    <div class="setting-body">
        <h3 class="fs-17 font-weight-semi-bold pb-4">Live Chat</h3>
        <div id="app">
            <chat-message></chat-message>
        </div>
    </div>
    <!-- end setting-body -->
</div>
<!-- end tab-pane -->
@endsection
