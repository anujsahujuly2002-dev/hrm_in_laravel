<form class="mt-4" wire:submit.prevent="create">
    @include('include.messages')
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control mb-0" id="username" name="username" wire:model.defer="username" placeholder="Create a username">
        @error('username')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" class="form-control mb-0" id="name" name="name" wire:model.defer="name" placeholder="Your full name">
        @error('name')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control mb-0" id="email" name="email" wire:model.defer="email" placeholder="Enter email">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control mb-0" id="password" name="password" wire:model.defer="password" placeholder="Password">
        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="d-inline-block w-100">
        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
            <input type="checkbox" class="custom-control-input" id="customCheck1">
            <label class="custom-control-label" for="customCheck1">Agree to <a href="#">terms & conditions</a></label>
        </div>
        <button type="submit" class="btn btn-primary float-right">Create & Continue</button>
    </div>
    <div class="sign-info">
        {{-- <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="#">Sign up</a></span> --}}
        <ul class="iq-social-media">
            <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
            <li><a href="#"><i class="ri-twitter-line"></i></a></li>
            <li><a href="#"><i class="ri-instagram-line"></i></a></li>
        </ul>
    </div>
</form>
