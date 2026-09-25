<!DOCTYPE html>
<html>

<head>
    <title>My Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

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


    <!-- ADD NEW TASK -->
    <div class="add-task-box">

        <h2>Add New Task</h2>

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="input-row">

                <!-- TASK NAME -->
                <div class="input-box">

                    <span class="input-icon">▤</span>

                    <input
                        type="text"
                        name="task_name"
                        placeholder="Task Name"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->
                <div class="input-box">

                    <span class="input-icon">☰</span>

                    <input
                        type="text"
                        name="description"
                        placeholder="Description"
                    >

                </div>

            </div>


            <div class="input-row">

                <!-- STATUS -->
                <div class="input-box">

                    <span class="input-icon">◆</span>

                    <select name="status">

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Ongoing">
                            Ongoing
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                    </select>

                </div>


                <!-- DUE DATE -->
                <div class="input-box">

                    <span class="input-icon">▣</span>

                    <input
                        type="date"
                        name="due_date"
                    >

                </div>

            </div>


            <button
                type="submit"
                class="add-task-button"
            >
                Add Task
            </button>

        </form>

    </div>


    <!-- MY TASKS -->
    <div class="tasks-container">

        <div class="tasks-header">

            <h2>My Tasks</h2>

            <div class="task-filter">
                All
                <span>⌄</span>
            </div>

        </div>


        <!-- TASK LIST -->

        @foreach ($tasks as $task)

            @php
                $status = strtolower($task->status);
            @endphp

            <div class="task">

                <!-- CHECK CIRCLE -->
                <div class="check-circle
                    @if($status == 'completed')
                        completed
                    @endif
                ">

                    @if($status == 'completed')
                        ✓
                    @endif

                </div>


                <!-- TASK INFORMATION -->
                <div class="task-information">

                    <h3
                        @if($status == 'completed')
                            class="completed-text"
                        @endif
                    >
                        {{ $task->task_name }}
                    </h3>

                    @if($task->description)

                        <p class="description">
                            {{ $task->description }}
                        </p>

                    @endif

                </div>


                <!-- STATUS -->
                <div class="status">

                    @if($status == 'pending')

                        <span class="pending">
                            Pending
                        </span>

                    @elseif($status == 'ongoing')

                        <span class="ongoing">
                            Ongoing
                        </span>

                    @elseif($status == 'completed')

                        <span class="completed">
                            Completed
                        </span>

                    @endif

                </div>


                <!-- DATE -->
                <div class="task-date">

                    @if($task->due_date)

                        <span class="calendar-icon">
                            ▣
                        </span>

                        {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}

                    @else

                        <span class="no-date">
                            No date
                        </span>

                    @endif

                </div>


                <!-- ACTIONS -->
                <div class="actions">

                    <!-- EDIT -->
                    <a
                        href="{{ route('tasks.edit', $task->id) }}"
                        class="edit-button"
                        title="Edit task"
                    >
                        ✎
                    </a>


                    <!-- DELETE -->
                    <form
                        action="{{ route('tasks.destroy', $task->id) }}"
                        method="POST"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="delete-button"
                            onclick="return confirm('Are you sure you want to delete this task?')"
                            title="Delete task"
                        >
                            ♡
                        </button>

                    </form>

                </div>

            </div>

        @endforeach


        <!-- NO TASKS -->

        @if($tasks->count() == 0)

            <div class="no-tasks">

                <div class="empty-icon">
                    ☺
                </div>

                <h3>No tasks yet!</h3>

                <p>Add your first task above.</p>

            </div>

        @endif

    </div>

</div>

</body>
</html>