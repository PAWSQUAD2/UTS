first=p2;
p2->next=p1;
p1->next=p3;
-->>
p2->next->next=p2;
p2->next=p3;
first = p1;