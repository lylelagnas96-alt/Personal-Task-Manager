<!DOCTYPE html>
<html>

<head>

    <title>Edit Task - My Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body class="edit-page">

<div class="container">

    <!-- HEADER -->

    <div class="header">

        <div class="title-area">

            <div class="title-icon">
                ☺
            </div>

            <div>

                <h1>My Task Manager</h1>

                <p>Stay organized. Get things done.</p>

            </div>

        </div>

    </div>


    <!-- EDIT TASK -->

    <div class="edit-card">

        <h2>Edit Task</h2>

        <p class="edit-subtitle">
            Make a small change to your task.
        </p>


        <form
            action="{{ route('tasks.update', $task->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- TASK NAME -->

            <div class="edit-form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ $task->task_name }}"
                    placeholder="Task Name"
                    required
                >

            </div>


            <!-- DESCRIPTION -->

            <div class="edit-form-group">

                <label for="description">
                    Description
                </label>

                <input
                    type="text"
                    id="description"
                    name="description"
                    value="{{ $task->description }}"
                    placeholder="Description"
                >

            </div>


            <!-- STATUS -->

            <div class="edit-form-group">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                >

                    <option
                        value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="Ongoing"
                        {{ $task->status == 'Ongoing' ? 'selected' : '' }}
                    >
                        Ongoing
                    </option>

                    <option
                        value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}
                    >
                        Completed
                    </option>

                </select>

            </div>


            <!-- DUE DATE -->

            <div class="edit-form-group">

                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ $task->due_date }}"
                >

            </div>


            <!-- BUTTONS -->

            <div class="edit-buttons">

                <a
                    href="{{ route('tasks.index') }}"
                    class="back-button"
                >
                    ← Back to Tasks
                </a>


                <button
                    type="submit"
                    class="update-button"
                >
                    ✓ Update Task
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>