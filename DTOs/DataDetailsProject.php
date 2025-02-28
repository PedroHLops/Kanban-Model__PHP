<?PHP
    class DataDetailsProject{
        public $id;
        public $name;
        public $description;
        public $created_at;
        public $team;
        public $term;
        public $leader;

        public function __construct(Project $project){
            $this->name = $project->getName();
            $this->description = $project->getDescription();
            $this->created_at = $project->getCreatedAt();
            $this->team = $project->getTeam();
            $this->term = $project->getTerm();
            $this->leader = $project->getLeader();
        }

    }
?>