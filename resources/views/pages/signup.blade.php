<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
</head>
<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="/signup" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group column">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}">
                </div>
                <div class="form-group column">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group column">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group column">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group column">
                    <label for="role">Role</label>
                    <select id="role" name="role" required>
                        <option value="1">Student</option>
                        <option value="2">Admin</option>
                        <option value="3">Teacher</option>
                    </select>
                </div>
                <div class="form-group column">
                    <label for="image">Profile Image</label>
                    <input type="file" id="image" name="image">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group column">
                    <label for="designation">Designation</label>
                    <input type="text" id="designation" name="designation" value="{{ old('designation') }}">
                </div>
                <div class="form-group column">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group column">
                    <label for="fb">Facebook Profile</label>
                    <input type="url" id="fb" name="fb" value="{{ old('fb') }}">
                </div>
                <div class="form-group column">
                    <label for="twitter">Twitter Profile</label>
                    <input type="url" id="twitter" name="twitter" value="{{ old('twitter') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group column">
                    <label for="linkedin">LinkedIn Profile</label>
                    <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin') }}">
                </div>
                <div class="form-row"><button type="submit">Sign Up</button></div>
            </div>

        </form>
    </div>
</body>
</html>
