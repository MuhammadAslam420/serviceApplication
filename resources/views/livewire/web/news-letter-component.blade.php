<div>
    <h2 class="footer-subtitle">Newsletter Signup</h2>
    <div class="subscribe-form">
        <form wire:submit.prevent='sendLetter'>
            <input type="email" class="form-control" placeholder="Enter Email Address" name='email' wire:model='email'>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        <button type="submit" class="btn footer-btn">
            <i class="feather-send"></i>
        </button>
        </form>
    </div>
</div>