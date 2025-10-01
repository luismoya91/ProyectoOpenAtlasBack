<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'Backlog',
             'description' => 'Project is in the backlog and not yet started.',
             'type' => 'Project',
             'color' => '#FF5733'
            ],
            ['name' => 'Planned',
             'description' => 'Project is planned and scheduled to be worked on.',
             'type' => 'Project',
             'color' => '#27F5F5'
            ],
            ['name' => 'In Progress',
             'description' => 'Project is currently being worked on.',
             'type' => 'Project',
             'color' => '#15A1A1'
            ],
            ['name' => 'Completed',
             'description' => 'Project has been completed successfully.',
             'type' => 'Project',
             'color' => '#8D33FF'
            ],
            ['name' => 'Archived',
             'description' => 'Project is archived and no longer active.',
             'type' => 'Project',
             'color' => '#A9A9A9'
            ],
            ['name' => 'On Hold',
             'description' => 'Project is temporarily on hold.',
             'type' => 'Project',
             'color' => '#FFD700'
            ],
            ['name' => 'Cancelled',
             'description' => 'Project has been cancelled and will not be completed.',
             'type' => 'Project',
             'color' => '#FF0000'
            ],
            ['name' => 'New',
             'description' => 'Task has been created but not yet started.',
             'type' => 'Task',
             'color' => '#33C1FF'
            ],
            ['name' => 'In Progress',
             'description' => 'Task is currently being worked on.',
             'type' => 'Task',
             'color' => '#33FF57'
            ],
            ['name' => 'Completed',
             'description' => 'Task has been completed successfully.',
             'type' => 'Task',
             'color' => '#8D33FF'
            ],
            ['name' => 'Blocked',
             'description' => 'Task is blocked and cannot proceed until the issue is resolved.',
             'type' => 'Task',
             'color' => '#FF5733'
            ],
            ['name' => 'On Hold',
             'description' => 'Task is temporarily on hold.',
             'type' => 'Task',
             'color' => '#FFD700'
            ],
            ['name' => 'Cancelled',
             'description' => 'Task has been cancelled and will not be completed.',
             'type' => 'Task',
             'color' => '#FF0000'
            ],
            ['name' => 'Open',
             'description' => 'Issue has been reported and is open for investigation.',
             'type' => 'Issue',
             'color' => '#33C1FF'
            ],
            ['name' => 'In Progress',
             'description' => 'Issue is currently being investigated or worked on.',
             'type' => 'Issue',
             'color' => '#33FF57'
            ],
            ['name' => 'Resolved',
             'description' => 'Issue has been resolved but not yet verified.',
             'type' => 'Issue',
             'color' => '#8D33FF'
            ],
            ['name' => 'Closed',
             'description' => 'Issue has been verified and closed.',
             'type' => 'Issue',
             'color' => '#A9A9A9'
            ],
            ['name' => 'Reopened',
             'description' => 'Issue has been reopened after being closed.',
             'type' => 'Issue',
             'color' => '#FF5733'
            ],
            ['name' => 'Duplicate',
             'description' => 'Issue is a duplicate of another issue.',
             'type' => 'Issue',
             'color' => '#FFD700'
            ],
        ]);
    }
}
