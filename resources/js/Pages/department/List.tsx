import React, {useEffect, useState} from "react";
import PanelLayout from "@/components/Layout/Layout";
import {Card, CardContent, CardFooter, CardHeader, CardTitle} from "@/components/ui/card";
import {Search} from "lucide-react";
import { Input } from "@/components/ui/input";

interface Department {
    id: number;
    name: string;
    detail: string;
}
const List = ({departments} : {
    departments : Department[]
}) => {
    const [searchTerm, setSearchTerm] = useState('')
    const filteredDepartments = departments.filter(dept =>
        dept?.name?.toLowerCase().includes(searchTerm.toLowerCase())
    )
    return <>
        <PanelLayout>
            <div className="container mx-auto py-8 px-4">
                <h1 className="text-3xl font-bold mb-8 text-center">Danh sách Phòng ban</h1>

                <div className="flex items-center mb-6">
                    <Search className="w-5 h-5 mr-2 text-muted-foreground"/>
                    <Input
                        type="text"
                        placeholder="Tìm kiếm phòng ban"
                        value={searchTerm}
                        onChange={(e) => setSearchTerm(e.target.value)}
                        className="max-w-md"
                    />
                </div>

                <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {filteredDepartments.map((dept) => (
                        <Card key={dept.id} className="flex flex-col">
                            <CardHeader>
                                <CardTitle>{dept.name}</CardTitle>
                            </CardHeader>
                            <CardContent className="flex-grow">
                                <p className="text-muted-foreground">{dept.detail}</p>
                            </CardContent>
                        </Card>
                    ))}
                </div>

                {filteredDepartments.length === 0 && (
                    <p className="text-center text-muted-foreground mt-8">
                        Không tìm thấy kết quả phù hợp. Vui lòng thử lại với từ khóa khác.
                    </p>
                )}
            </div>
        </PanelLayout>
    </>
}

export default List;
