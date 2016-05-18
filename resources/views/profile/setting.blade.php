@extends('masterpage')

@section('content')

    <div class="container">
        <h2>Change Your Password</h2>

        <form method="post" action="{{ url('/profile/') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <table>
                <tr>
                    <td>Current Password</td>
                    <td>
                        <input type="password" class="form-control" name="cp">
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" class="form-control" name="np">
                    </td>
                </tr>
                <tr>
                    <td>Confirm new Password</td>
                    <td>
                        <input type="password" class="form-control" name="cnp">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-success">Change Password</button>
                    </td>
                </tr>
            </table>

        </form>
    </div>

@stop